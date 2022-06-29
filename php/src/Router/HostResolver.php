<?php

class Router_HostResolver
{
    /**
     * @param string $host
     * @return Enum_Site
     */
    public function resolve($host)
    {
        return
            preg_match('/borderfield|bordermodels|menandwomen/ui', $host)
                ? Enum_Site::borderfield()
                : Enum_Site::castingteam()
            ;
    }
}