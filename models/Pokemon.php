<?php


class Pokemon
{

    private int $id;
    private string $nom;
    private int $pv;
    private int $pc;
    private string $imagepath;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getPv(): int
    {
        return $this->pv;
    }

    /**
     * @param int $pv
     */
    public function setPv(int $pv): void
    {
        $this->pv = $pv;
    }

    /**
     * @return int
     */
    public function getPc(): int
    {
        return $this->pc;
    }

    /**
     * @param int $pc
     */
    public function setPc(int $pc): void
    {
        $this->pc = $pc;
    }

    /**
     * @return string
     */
    public function getImagepath(): string
    {
        return $this->imagepath;
    }

    /**
     * @param string $imagepath
     */
    public function setImagepath(string $imagepath): void
    {
        $this->imagepath = $imagepath;
    }



}