<?php

class SmartSearch_StringAnalyzer extends StringAnalyzer
{
    /**
     * {@inheritdoc}
     */
    public function analyze($string)
    {
        foreach ($this->map as $item) {
            if (preg_match($item['regex'], $string, $matches)) {
                if (empty($item['value'])) {
                    foreach ($matches as $match) {
                        if (!preg_match('/\D/', $match)) {
                            $value = $match;
                        }
                    }
                } else {
                    $value = $item['value'];
                }

                if (isset($value)) {
                    if (!preg_match('/start/ui', $item['key'])) {
                        $string = trim(preg_replace($item['regex'], '', $string));
                    }

                    $this->matches[$item['key']] = $value;
                }
            }
        }

        return $this->matches;
    }
}