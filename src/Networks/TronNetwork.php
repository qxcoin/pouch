<?php

namespace QXCoin\Pouch\Networks;

use QXCoin\Pouch\Address\TronAddressGenerator;
use QXCoin\Pouch\PrivateKey\RawPrivateKeyGenerator;
use QXCoin\Pouch\PublicKey\RawPublicKeyGenerator;

final class TronNetwork implements NetworkInterface
{
    private readonly bool $testnet;

    public function __construct(bool $testnet = false)
    {
        $this->testnet = $testnet;
    }

    public function getBip32PublicVersionBytes(): int
    {
        return $this->testnet ? 0x43587cf : 0x488b21e;
    }

    public function getBip32PrivateVersionBytes(): int
    {
        return $this->testnet ? 0x4358394 : 0x488ade4;
    }

    public function getBip44Purpose(): int
    {
        return 44;
    }

    public function getBip44CoinType(): int
    {
        return 195;
    }

    public function getAddressGenerator(): TronAddressGenerator
    {
        return new TronAddressGenerator($this->getPublicKeyGenerator());
    }

    public function getPublicKeyGenerator(): RawPublicKeyGenerator
    {
        return new RawPublicKeyGenerator();
    }

    public function getPrivateKeyGenerator(): RawPrivateKeyGenerator
    {
        return new RawPrivateKeyGenerator();
    }
}
