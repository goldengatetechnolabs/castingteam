<?php

class SmartSearch_MapFormatter
{
    /**
     * @param array $data
     * @return array
     */
    public static function format(array $data)
    {
        $formattedData = [];

        foreach ($data as $item) {
            $formattedData[] = [
                'regex' => sprintf('/%s/ui', $item['naam']),
                'key' => 'specific',
                'value' => $item['id']
            ];
        }

        return $formattedData;
    }
}