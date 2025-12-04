<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VeilleInformatiqueController extends AbstractController
{
    #[Route('/veille-informatique', name: 'app_veille_informatique')]
    public function index(): Response
    {
        $rssUrl = 'https://www.numerama.com/tag/intelligence-artificielle/feed/';
        $rssContent = file_get_contents($rssUrl);
        // Force UTF-8 encoding
        // $rssContent = mb_convert_encoding($rssContent, 'UTF-8', 'ISO-8859-1');
        $rss = @simplexml_load_string($rssContent);
        
        $articles = [];

        if ($rss) {
            $formatter = new \IntlDateFormatter(
                'fr_FR',
                \IntlDateFormatter::FULL,
                \IntlDateFormatter::NONE,
                'Europe/Paris',
                \IntlDateFormatter::GREGORIAN,
                'eeee d MMMM y'
            );

            $count = 0;
            foreach ($rss->channel->item as $item) {
                if ($count >= 5) {
                    break;
                }

                $date = new \DateTime((string) $item->pubDate);

                $articles[] = [
                    'title' => (string) $item->title,
                    'link' => (string) $item->link,
                    'description' => html_entity_decode((string) $item->description),
                    'pubDate' => ucfirst($formatter->format($date)),
                ];
                $count++;
            }
        }

        return $this->render('veille_informatique/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
