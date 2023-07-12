<?php
    require_once('./assets/config/Pokemon.php');

    Class PokemonDao{
        
        public function getColorType($type) {
            $color = "#DDD";
        
            switch($type) {
                case "fire":
                    $color = "#F08030";
                    break;
                case "water":
                    $color = "#6890F0";
                    break;
                case "grass":
                    $color = "#78C850";
                    break;
                case "electric":
                    $color = "#F8D030";
                    break;
                case "ice":
                    $color = "#98D8D8";
                    break;
                case "fighting":
                    $color = "#C03028";
                    break;
                case "poison":
                    $color = "#A040A0";
                    break;
                case "ground":
                    $color = "#E0C068";
                    break;
                case "flying":
                    $color = "#A890F0";
                    break;
                case "psychic":
                    $color = "#F85888";
                    break;
                case "bug":
                    $color = "#A8B820";
                    break;
                case "rock":
                    $color = "#B8A038";
                    break;
                case "ghost":
                    $color = "#705898";
                    break;
                case "dragon":
                    $color = "#7038F8";
                    break;
                case "dark":
                    $color = "#705848";
                    break;
                case "steel":
                    $color = "#B8B8D0";
                    break;
                case "fairy":
                    $color = "#EE99AC";
                    break;
                default:
                    $color = "#DDDDDD";
                    break;
            }
        
            return $color;
        }

    public function pokemonList($paginationType = null) {
        $pokemonArray = [];
        $perPage = 8; // número de itens por página
    
        if (!isset($_SESSION['page'])) {
            $_SESSION['page'] = 1;
        }
    
        // incrementa ou decrementa a página atual com base no tipo de paginação
        if ($paginationType == "after") {
            $_SESSION['page']++;
        } elseif ($paginationType == "before") {
            $_SESSION['page']--;
        }
    
        $currentPage = $_SESSION['page'];
    
        // determina o offset com base na página atual e no número de itens por página
        $offset = ($currentPage - 1) * $perPage;
    
        // define o range de itens a serem exibidos com base no offset e no número de itens por página
        $initPokemon = $offset + 1;
        $mountPokemon = $offset + $perPage;

        for($i = $initPokemon; $i <= $mountPokemon; $i++) {
            $urlApi = "https://pokeapi.co/api/v2/pokemon/".$i;

            $data = file_get_contents($urlApi);

            $responsePokemon = json_decode($data);

            $objPokemon = new Pokemon();
            $objPokemon->setName($responsePokemon->name);
            $objPokemon->setId($responsePokemon->id);
            $objPokemon->setUrlImage($responsePokemon->sprites->versions->{'generation-v'}->{'black-white'}->animated->front_default);

            foreach ($responsePokemon->types as $type) {
                $idType = $type->slot;
                $nameType = $type->type->name;

                if ($idType == 1) {
                    $objPokemon->setColor($this->getColorType($nameType));
                }

                $objPokemon->setTypes($idType, $nameType);

            }

            $pokemonArray[] = $objPokemon;
        } 

        return $pokemonArray;
    }

    }
?>