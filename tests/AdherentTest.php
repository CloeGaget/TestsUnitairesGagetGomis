<?php 
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AdherentTest extends TestCase {
    public function testCanBeCreated(): void {
        $adherent = new Adherent();
        $this->assertInstanceOf(Adherent::Class,$adherent);
    }
}

?>