<?php
    class Pokemon {
        private $id;
        private $name;
        private $types = [];
        private $urlImage;
        private $color;

        public function setId($id) {
            $this->id = $id;
        }

        public function getId() {
            return $this->id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getName() {
            return $this->name;
        }

        public function setTypes($index, $type) {
            $this->types[$index] = $type;
        }

        public function getTypes($index) {
            return isset($this->types[$index]) ? $this->types[$index] : null;
        }

        public function setUrlImage($urlImage) {
            $this->urlImage = $urlImage;
        }

        public function getUrlImage() {
            return $this->urlImage;
        }

        public function setColor($color) {
            $this->color = $color;
        }

        public function getColor() {
            return $this->color;
        }

        public function getCountTypes() {
            return count($this->types);
        }

    }
?>