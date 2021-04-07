<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <DARK SIDE TEAM> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Poul-Henning Kamp
 * ----------------------------------------------------------------------------
 */

// modules/yourmodule/src/Entity/ProductComment.php
namespace DarkBlog\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class DarkBlogTest
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_dark_blog_test", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="test_string", type="string", length=500)
     */
    private $testString;
   

    /**
     * @var string
     *
     * @ORM\Column(name="test_lang", type="string", length=500)
     */
    private $testLang;


    /**
     * @return int
     */
    public function getIdDarkBlogTest()
    {
        return $this->idDarkBlogTest;
    }

    /**
     * @return string
     */
    public function getTestString()
    {
        return $this->testString;
    }

    /**
     * @param string $testString
     *
     * @return DarkBlogTest
     */
    public function setTestString($testString)
    {
        $this->testString = $testString;

        return $this;
    }

    /**
     * @return string
     */
    public function getTestLang()
    {
        return $this->testLang;
    }

    /**
     * @param string $testLang
     *
     * @return DarkBlogTest
     */
    public function setTestLang($testLang)
    {
        $this->testLang = $testLang;

        return $this;
    }




    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getIdDarkBlogTest(),
            'test_string' => $this->getTestString(),
            'test_lang' => $this->getTestLang()
        ];
    }
}
