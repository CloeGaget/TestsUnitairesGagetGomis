<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\User;

class UserTest extends TestCase {
    public function testNewUser() {
        $this->asserInstanceOf(User::class, new User());
    }
    
    
    public function testUserPrenom() {
        $user = new User();
        $user->setPrenom("Michel");
        $this->assertEquals("Michel", $user->getPrenom());
    }

}
