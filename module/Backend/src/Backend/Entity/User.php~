<?php

/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Backend\Entity;

use BjyAuthorize\Provider\Role\ProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ZfcUser\Entity\UserInterface;

/**
 * An example of how to implement a role aware user entity.
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class User implements UserInterface, ProviderInterface {

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true, nullable=true)
     */
    protected $username;

    /**
     * @var string
     * @ORM\Column(type="string",  length=255)
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $displayName;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    protected $password;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $state;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\ManyToMany(targetEntity="Backend\Entity\Role")
     * @ORM\JoinTable(name="user_role_linker",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     */
    protected $roles;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $logo;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $orgname;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $timeCreate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $timeUpdate;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $contactSur;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $contactLast;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $contactSex;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $street;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $streetNr;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $zip;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $notice;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $doubleoptin;
    
    
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $forgotpwtoken;
    

    /**
     * Initialies the roles variable.
     */
    public function __construct() {
        $this->roles = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param int $id
     *
     * @return void
     */
    public function setId($id) {
        $this->id = (int) $id;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return void
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Get displayName.
     *
     * @return string
     */
    public function getDisplayName() {
        return $this->displayName;
    }

    /**
     * Set displayName.
     *
     * @param string $displayName
     *
     * @return void
     */
    public function setDisplayName($displayName) {
        $this->displayName = $displayName;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return void
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Get state.
     *
     * @return int
     */
    public function getState() {
        return $this->state;
    }

    /**
     * Set state.
     *
     * @param int $state
     *
     * @return void
     */
    public function setState($state) {
        $this->state = $state;
    }

    /**
     * Get role.
     *
     * @return array
     */
    public function getRoles() {
        return $this->roles->getValues();
    }

    /**
     * Add a role to the user.
     *
     * @param Role $role
     *
     * @return void
     */
    public function addRole($role) {
        $this->roles[] = $role;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return User
     */
    public function setLogo($logo) {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo() {
        return $this->logo;
    }

    /**
     * Set orgname
     *
     * @param string $orgname
     * @return User
     */
    public function setOrgname($orgname) {
        $this->orgname = $orgname;

        return $this;
    }

    /**
     * Get orgname
     *
     * @return string 
     */
    public function getOrgname() {
        return $this->orgname;
    }

    /**
     * Set timeCreate
     *
     * @param \DateTime $timeCreate
     * @return User
     */
    public function setTimeCreate($timeCreate) {
        $this->timeCreate = $timeCreate;

        return $this;
    }

    /**
     * Get timeCreate
     *
     * @return \DateTime 
     */
    public function getTimeCreate() {
        return $this->timeCreate;
    }

    /**
     * Set timeUpdate
     *
     * @param \DateTime $timeUpdate
     * @return User
     */
    public function setTimeUpdate($timeUpdate) {
        $this->timeUpdate = $timeUpdate;

        return $this;
    }

    /**
     * Get timeUpdate
     *
     * @return \DateTime 
     */
    public function getTimeUpdate() {
        return $this->timeUpdate;
    }

    /**
     * Set contactSur
     *
     * @param string $contactSur
     * @return User
     */
    public function setContactSur($contactSur) {
        $this->contactSur = $contactSur;

        return $this;
    }

    /**
     * Get contactSur
     *
     * @return string 
     */
    public function getContactSur() {
        return $this->contactSur;
    }

    /**
     * Set contactLast
     *
     * @param string $contactLast
     * @return User
     */
    public function setContactLast($contactLast) {
        $this->contactLast = $contactLast;

        return $this;
    }

    /**
     * Get contactLast
     *
     * @return string 
     */
    public function getContactLast() {
        return $this->contactLast;
    }

    /**
     * Set contactSex
     *
     * @param integer $contactSex
     * @return User
     */
    public function setContactSex($contactSex) {
        $this->contactSex = $contactSex;

        return $this;
    }

    /**
     * Get contactSex
     *
     * @return integer 
     */
    public function getContactSex() {
        return $this->contactSex;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return User
     */
    public function setStreet($street) {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet() {
        return $this->street;
    }

    /**
     * Set streetNr
     *
     * @param string $streetNr
     * @return User
     */
    public function setStreetNr($streetNr) {
        $this->streetNr = $streetNr;

        return $this;
    }

    /**
     * Get streetNr
     *
     * @return string 
     */
    public function getStreetNr() {
        return $this->streetNr;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     * @return User
     */
    public function setZip($zip) {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return integer 
     */
    public function getZip() {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set notice
     *
     * @param string $notice
     * @return User
     */
    public function setNotice($notice) {
        $this->notice = $notice;

        return $this;
    }

    /**
     * Get notice
     *
     * @return string 
     */
    public function getNotice() {
        return $this->notice;
    }

    /**
     * Remove roles
     *
     * @param \Backend\Entity\Role $roles
     */
    public function removeRole(\Backend\Entity\Role $roles) {
        $this->roles->removeElement($roles);
    }

    /**
     * Set doubleoptin
     *
     * @param string $doubleoptin
     * @return User
     */
    public function setDoubleoptin($charcount) {
        $this->doubleoptin = $this->generateToken($charcount);
    }

    /**
     * Get doubleoptin
     *
     * @return string 
     */
    public function getDoubleoptin() {
        return $this->doubleoptin;
    }

    
    
    //Die beiden Mail Funktionen könnte man noch zusammenführen und lediglich den Body 
    public function sendConfirmationMail() {

        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $header .= "From: noreply@badenfahrt2017.ch\r\n";
        //$header .= "Reply-To: noreply@badenfahrt2017.ch\r\n";
        $header .= "X-Mailer: PHP " . phpversion();
        $rcpt = $this->getEmail();
        $subject = "Benutzerportal Badenfahrt 2017 - Bitte bestätigen Sie Ihre E-Mail Adresse";

        //$body  = file_get_contents('ergend e hmtl vorlag');
        $link = "http://badenfahrt.local/Backend/confirm?doi=" . $this->getDoubleoptin();

        $body = "<html>
                <head>
                    <title>Willkommen bei der Badenfahrt 2017</title>
                </head>
                    <p>Bitte bestätigen Sie Ihre <a href=$link>E-Mail Adresse</a>.</p>
                    <p>und so wiiter</p>
                <body>
  
                </body>
                </html>
                    ";
        return mail($rcpt, $subject, $body, $header);
    }
    
    
    
    public function sendForgotPasswordMail() {
        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $header .= "From: noreply@badenfahrt2017.ch\r\n";
        //$header .= "Reply-To: noreply@badenfahrt2017.ch\r\n";
        $header .= "X-Mailer: PHP " . phpversion();
        $rcpt = $this->getEmail();
        $subject = "Benutzerportal Badenfahrt 2017 - Passwort Zurücksetzen";

        //$body  = file_get_contents('ergend e hmtl vorlag');
        $link = "http://badenfahrt.local/user/resetpassword?pwtoken=" . $this->getForgotpwtoken();

        $body = "<html>
                <head>
                    <title>Willkommen bei der Badenfahrt 2017</title>
                </head>
                    <p><a href=$link>Hier</a> können Sie Ihr neues Passwort setzen.</p>
                    <p>und so wiiter</p>
                <body>
  
                </body>
                </html>
                    ";
        return mail($rcpt, $subject, $body, $header);
    }
    
    


    /**
     * Set forgotpwtoken
     *
     * @param string $forgotpwtoken
     * @return User
     */
    public function setForgotpwtoken($charcount)
    {
        
        $this->forgotpwtoken = $this->generateToken($charcount);

        return $this;
    }

    /**
     * Get forgotpwtoken
     *
     * @return string 
     */
    public function getForgotpwtoken()
    {
        return $this->forgotpwtoken;
    }
    
    
    private function generateToken($charcount){
        mt_srand((double) microtime() * 1000000);
        $set = "ABCDEFGHIKLMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
        $token = "";

        for ($i = 1; $i <= $charcount; $i++) {
            $token .= $set[mt_rand(0, (strlen($set) - 1))];
        }


        return $token;
    }
    
    
}
