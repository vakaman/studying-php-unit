<?php

namespace Src\OrderBundle\Service;

use Src\OrderBundle\Repository\BadWordsRepositoryInterface;

class BadWordsValidator
{
    private $badWordsRepository;

    public function __construct(BadWordsRepositoryInterface $badWordsRepository)
    {
        $this->badWordsRepository = $badWordsRepository;
    }

    public function hasBadWords($text)
    {
        $allBadWords = $this->badWordsRepository->findAllAsArray();
        foreach ($allBadWords as $badWord) {
            if (strpos($text, $badWord) !== false) {
                return true;
            }
        }

        return false;
    }
}