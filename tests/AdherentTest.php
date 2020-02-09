<?php 
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AdherentTest extends TestCase {
    public function testCanBeCreated(): void {
        $adherent = new Adherent("michmich", "delacompta", "2019-12-12");
        $this->assertInstanceOf(Adherent::Class, $adherent);
    }
    
    public function testIsIdentifiantNormalise(): void {
        
    }
    
    public function testCreateName(): void {
        $adherent = new Adherent('gomis', 'lucas', '01/01/1995');
        $this->assertEquals('GOMISLUCAS01011995',
            $adherent->getIdentifiantNormalise()
        );
    }
}

?>