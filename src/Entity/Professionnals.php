<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfessionnalsRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


// Voici l'entité patient, ATTENTION, elle est au pluriel ici car pour moi c'est la class qui contient les données des utilisateurs PATIENT
// C'est la même choses pour les Professionnels de santé si ce n'est quelques champs
// Les deux ont la class UserInterface et PasswordAuthen.. qui me permet de les faires connecter mais aussi les enregistrer en tant qu'utilisateur pour symfony

// ATTENTION VOIR SECURITY YAML POUR COMPRENDRE QUELS CLASS SONT CONSIDERER COMME UTILISATEUR 
// POUR CREER UN AUTRE TYPE DUTILISATEUR, CREER SA CLASSE IMPLEMENTER LES CLASSE USERINTERFACE ET PASSWORD AUTHENTICA
// METTRE LA CLASSE PASSWORD AUTHENTICAT SUR LE REPOSITORY DE LA CLASSE (UTILISATEUR) QUE VOUS AVEZ CREER ET ALLEZ LE RAJOUTER COMME SUIS SUR SECURITY YAML


#[ORM\Entity(repositoryClass: ProfessionnalsRepository::class)]
class Professionnals implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private array $roles = ['ROLE_DOCTOR'];

    #[ORM\Column(length: 255)]
    private ?string $Username = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;


    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 13)]
    private ?string $phone_number = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'professionnals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Specialities $speciality = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 8,
        minMessage: 'Votre mot de passe doit contenir au minimum {{ limit }} caractère',
    )]
    private ?string $password = null;
    
    #[Assert\EqualTo(propertyPath: "password",  message: "Vos mot de passe ne sont pas les mêmes !!!" )]
    public ?string $confirm_password = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Expertises = null;

    #[ORM\Column(length: 5)]
    private ?string $postalCode = null;

    // ATTENTION CETTE COLUMN SERT A LA RE INITIALISATION DE MDP, Y TOUCHER AVEC LE PLUS GRAND SOIN !!!
    #[ORM\Column(type: 'string', length: 255, nullable:true)]
    private ?string $resetToken = null;

    #[ORM\ManyToMany(targetEntity: Appointment::class, mappedBy: 'professionnal')]
    private Collection $appointments;



    public function __construct()
    {
        $this->appointments = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // Ici chaque professionnel de santé aura le role DOCTOR
        $roles[] = 'ROLE_DOCTOR';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

        /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }


        /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getSpeciality(): ?Specialities
    {
        return $this->speciality;
    }

    public function setSpeciality(?Specialities $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }


    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getExpertises(): ?string
    {
        return $this->Expertises;
    }

    public function setExpertises(string $Expertises): self
    {
        $this->Expertises = $Expertises;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

        /**
     * Get the value of resetToken
     */ 
    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    /**
     * Set the value of resetToken
     *
     * @return  self
     */ 
    public function setResetToken($resetToken): self
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    /**
     * @return Collection<int, Appointment>
     */
    public function getAppointments(): Collection
    {
        return $this->appointments;
    }

    public function addAppointment(Appointment $appointment): self
    {
        if (!$this->appointments->contains($appointment)) {
            $this->appointments->add($appointment);
            $appointment->addProfessionnal($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): self
    {
        if ($this->appointments->removeElement($appointment)) {
            $appointment->removeProfessionnal($this);
        }

        return $this;
    }



}
