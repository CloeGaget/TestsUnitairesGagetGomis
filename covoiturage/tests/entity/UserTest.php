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

    public function testUserUsername() {
        $this->user->setUsername("mic");
        $this->assertEquals("mic", $this->user->getUsername());
    }

    public function testUserPassword() {
        $this->user->setPassword("x");
        $this->assertEquals("x", $this->user->getPassword());
    }
    
    public function testUserEmail() {
        $this->user->setEmail("michel@mail.com");
        $this->assertEquals("michel@mail.com", $this->user->getEmail());
    }    

}
