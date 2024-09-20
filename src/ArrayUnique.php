<?php

function arrayUnique(array $lst): array
{
    return array_values(array_unique($lst));
}
