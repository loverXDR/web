<?php

namespace Lab2\DesignPatterns\Structural;

/**
 * Adapter - Структурный паттерн проектирования, который позволяет объектам с несовместимыми
 * интерфейсами работать вместе.
 */

/**
 * Целевой интерфейс, с которым будет работать наш клиентский код.
 */
interface MediaPlayer
{
    public function play(string $audioType, string $fileName): string;
}

/**
 * Несовместимый интерфейс, который нуждается в адаптации.
 */
interface AdvancedMediaPlayer
{
    public function playVlc(string $fileName): string;
    public function playMp4(string $fileName): string;
}

/**
 * Конкретные реализации несовместимого интерфейса.
 */
class VlcPlayer implements AdvancedMediaPlayer
{
    public function playVlc(string $fileName): string
    {
        return "Воспроизведение vlc файла: $fileName";
    }

    public function playMp4(string $fileName): string
    {
        return ""; // Ничего не делаем, это не поддерживаемый формат
    }
}

class Mp4Player implements AdvancedMediaPlayer
{
    public function playVlc(string $fileName): string
    {
        return ""; // Ничего не делаем, это не поддерживаемый формат
    }

    public function playMp4(string $fileName): string
    {
        return "Воспроизведение mp4 файла: $fileName";
    }
}

/**
 * Адаптер делает интерфейс несовместимого класса совместимым с целевым интерфейсом.
 */
class MediaAdapter implements MediaPlayer
{
    /**
     * @var AdvancedMediaPlayer
     */
    private $advancedMusicPlayer;

    public function __construct(string $audioType)
    {
        if ($audioType === "vlc") {
            $this->advancedMusicPlayer = new VlcPlayer();
        } elseif ($audioType === "mp4") {
            $this->advancedMusicPlayer = new Mp4Player();
        }
    }

    public function play(string $audioType, string $fileName): string
    {
        if ($audioType === "vlc") {
            return $this->advancedMusicPlayer->playVlc($fileName);
        } elseif ($audioType === "mp4") {
            return $this->advancedMusicPlayer->playMp4($fileName);
        }
        return "Формат файла $audioType не поддерживается";
    }
}

/**
 * Клиентский класс, который работает с целевым интерфейсом MediaPlayer.
 * Он может воспроизводить разные типы медиафайлов.
 */
class AudioPlayer implements MediaPlayer
{
    /**
     * @var MediaAdapter
     */
    private $mediaAdapter;

    public function play(string $audioType, string $fileName): string
    {
        // Встроенная поддержка для формата mp3
        if ($audioType === "mp3") {
            return "Воспроизведение mp3 файла: $fileName";
        }
        // Используем медиа-адаптер для форматов vlc и mp4
        elseif ($audioType === "vlc" || $audioType === "mp4") {
            $this->mediaAdapter = new MediaAdapter($audioType);
            return $this->mediaAdapter->play($audioType, $fileName);
        }
        
        return "Формат файла $audioType не поддерживается";
    }
} 