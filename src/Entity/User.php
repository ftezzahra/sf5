<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"user:read"}},
 *      denormalizationContext={"groups"={"user:write"}}
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"user:read"})
     */
    private $id;

   /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"user:read", "user:write"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"user:read", "user:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * 
     * @Groups({"user:read", "user:write"})
     */
    private $age;

    /**
     * @ORM\ManyToMany(targetEntity=Entity::class, inversedBy="users")
     * @ApiSubresource
     * 
     * @Groups({"user:read", "user:write"})
     */
    private $entities;

    public function __construct()
    {
        $this->entities = new ArrayCollection();
    }  

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getFirstName(): ?string {
		return $this->firstName;
	}

	public function setFirstName(?string $firstName) {
                                $this->firstName = $firstName;
                                
                                return $this;
                            }
    
	public function getName(): ?string {
                        		return $this->name;
                        	}

	public function setName(?string $name) {
                                $this->name = $name;
                                
                                return $this;
                            }
    
    public function getAge() {
		return $this->age;
	}

	public function setAge(int $age) {
                                $this->age = $age;
                        
                                return $this;
                        	}

    /**
     * @return Collection|Entity[]
     */
    public function getEntities(): Collection
    {
        return $this->entities;
    }

    public function addEntity(Entity $entity): self
    {
        if (!$this->entities->contains($entity)) {
            $this->entities[] = $entity;
        }

        return $this;
    }

    public function removeEntity(Entity $entity): self
    {
        $this->entities->removeElement($entity);

        return $this;
    }


}
