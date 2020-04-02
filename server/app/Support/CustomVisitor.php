<?php

namespace Support;

use CyrildeWit\EloquentViewable\Visitor;

class CustomVisitor extends Visitor
{
    protected $id;
    protected $ip;
    protected $hasDoNotTrackHeader;
    protected $isCrawler;

    /**
     * Get the unique ID that represent's the visitor.
     *
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    // /**
    //  * Get the visitor's IP address.
    //  *
    //  * @return string|null
    //  */
    // public function ip(): string
    // {
    //     return $this->ip;
    // }

    public function setIp(string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * Determine if the visitor has a "Do Not Track" header.
     *
     * @return bool
     */
    public function hasDoNotTrackHeader(): bool
    {
        return $this->hasDoNotTrackHeader;
    }

    public function setHasDoNotTrackHeader(bool $hasDoNotTrackHeader)
    {
        $this->hasDoNotTrackHeader = $hasDoNotTrackHeader;
    }

    /**
     * Determine if the visitor is a crawler.
     *
     * @return bool
     */
    public function isCrawler(): bool
    {
        return $this->isCrawler;
    }

    public function setIsCrawler(bool $isCrawler)
    {
        $this->isCrawler = $isCrawler;
    }
}
