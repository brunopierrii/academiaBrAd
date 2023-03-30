<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $cod_usuario = null;

    #[ORM\Column(length: 100)]
    private ?string $nome_usuario = null;

    #[ORM\Column]
    private ?int $usuario_login = null;

    #[ORM\Column(length: 255)]
    private ?string $senha_usuario = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodUsuario(): ?int
    {
        return $this->cod_usuario;
    }

    public function setCodUsuario(int $cod_usuario): self
    {
        $this->cod_usuario = $cod_usuario;

        return $this;
    }

    public function getNomeUsuario(): ?string
    {
        return $this->nome_usuario;
    }

    public function setNomeUsuario(string $nome_usuario): self
    {
        $this->nome_usuario = $nome_usuario;

        return $this;
    }

    public function getUsuarioLogin(): ?int
    {
        return $this->usuario_login;
    }

    public function setUsuarioLogin(int $usuario_login): self
    {
        $this->usuario_login = $usuario_login;

        return $this;
    }

    public function getSenhaUsuario(): ?string
    {
        return $this->senha_usuario;
    }

    public function setSenhaUsuario(string $senha_usuario): self
    {
        $this->senha_usuario = $senha_usuario;

        return $this;
    }
}
