<?php

namespace QXCoin\Pouch\PublicKey;

use GMP;

final class RawPublicKeyGenerator implements PublicKeyGeneratorInterface
{
    public function generate(GMP $x, GMP $y): string
    {
        $xHex = str_pad(gmp_strval($x, 16), 64, '0', STR_PAD_LEFT);
        $yHex = str_pad(gmp_strval($y, 16), 64, '0', STR_PAD_LEFT);

        return $xHex . $yHex;
    }
}
