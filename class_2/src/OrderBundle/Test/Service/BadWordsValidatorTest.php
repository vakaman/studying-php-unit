<?php

namespace App\OrderBundle\Test\Service;

use Src\OrderBundle\Repository\BadWordsRepository;
use PHPUnit\Framework\TestCase;
use Src\OrderBundle\Service\BadWordsValidator;

class BadWordsValidatorTest extends TestCase
{
    /**
     * @dataProvider badWordsDataProvider
     */
    public function test_has_bad_words($badWordList, $text, $foundBadWords)
    {
        $badWordsRepository = $this->createMock(BadWordsRepository::class);
        $badWordsRepository->method('findAllAsArray')->willReturn($badWordList);

        $badWords = new BadWordsValidator($badWordsRepository);

        $hasBadWords = $badWords->hasBadWords($text);

        $this->assertEquals($foundBadWords, $hasBadWords);
    }

    public static function badWordsDataProvider()
    {
        return [
            'should_find_when_has_bad_words' => [
                'badWordList' => ['crap', 'bollocks', 'wanker'],
                'text' => 'Are you wanker',
                'foundBadWords' => true
            ],
            'should_not_find_when_has_no_bad_words' => [
                'badWordList' => ['crap', 'bollocks', 'wanker'],
                'text' => 'Are you ok',
                'foundBadWords' => false
            ],
            'should_not_find_when_has_no_text' => [
                'badWordList' => ['crap', 'bollocks', 'wanker'],
                'text' => '',
                'foundBadWords' => false
            ],
            'should_not_find_when_has_no_bad_words_list' => [
                'badWordList' => [],
                'text' => 'Are you wanker',
                'foundBadWords' => false
            ],
        ];
    }
}
