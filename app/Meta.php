<?php

namespace App;

class Meta
{
    // Statičko skladište za meta tagove
    protected static $tags = [];
    protected static $title;
    /**
     * Dodavanje meta taga.
     *
     * @param string $name Ime meta taga ili naziv propertyja (npr. 'description' ili 'og:title')
     * @param string $content Sadržaj meta taga
     * @param string $attribute Tip atributa ('name' ili 'property'). Podrazumevano je 'name'.
     */
    public static function addMeta(string $name, string $content, string $attribute = 'name'): void
    {
        static::$tags[] = [
            'attribute' => $attribute,
            'name' => $name,
            'content' => $content,
        ];
    }

    /**
     * Renderovanje svih dodatih meta tagova u HTML.
     *
     * @return string HTML string sa meta tagovima.
     */

    public static function setTitle(string $title): void
    {
        static::$title = $title;
    }

    public static function renderTitle(): string
    {
        if (! static::$title) {
            return '';
        }
        return '<title>' . e(static::$title) . "</title>\n";
    }

    public static function render(): string
    {
        $output = '';

        foreach (static::$tags as $tag) {
            if ($tag['attribute'] === 'name') {
                $output .= sprintf('<meta name="%s" content="%s">', e($tag['name']), e($tag['content'])) . "\n";
            } else { // npr. 'property' za Open Graph tagove
                $output .= sprintf('<meta property="%s" content="%s">', e($tag['name']), e($tag['content'])) . "\n";
            }
        }

        return $output;
    }
}
