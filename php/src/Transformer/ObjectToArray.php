<?php

class Transformer_ObjectToArray
{
    /**
     * @param mixed $object
     * @return array
     */
    public function transform($object)
    {
        return is_null(get_class_methods($object)) || !preg_match('/Entity/ui', get_class($object))
            ? []
            : array_reduce(
                get_class_methods($object),
                function($merged, $getMethod) use ($object) {
                    if (!preg_match('/get/', $getMethod)) {
                        return $merged;
                    }

                    $property = mb_strtolower(preg_replace('/get/', '', $getMethod));

                    if (is_object($object->$getMethod())) {
                        $transformed = [$property => $this->transform($object->$getMethod())];
                    } elseif (is_array($object->$getMethod()) && count($object->$getMethod())) {
                        $collection = [];

                        foreach ($object->$getMethod() as $object) {
                            $collection[] = $this->transform($object);
                        }

                        $transformed = [$property => $collection];
                    } else {
                        $transformed = [$property => $object->$getMethod()];
                    }

                    return array_merge($merged, $transformed);
                },
                []
            );
    }
}