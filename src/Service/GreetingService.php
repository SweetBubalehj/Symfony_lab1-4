<?php
namespace App\Service;

/**
 * Generates random greeting message
 */
class GreetingService {

    /**
     * Greeting messages
     */
    private const MESSAGES = [
        "Hello!",
        "Holla!",
        "Yo!",
        "Salut!",
        "Konitiwa"
    ];

    /**
     * Get random greeting message.
     * e.g. Hello, Holla, Yo, Salut.
     *
     * @return string rantom greeting message
     */
    public function getGreetingMessage(): string
    {
        $index = array_rand(self::MESSAGES);
        return self::MESSAGES[$index];
    }
}