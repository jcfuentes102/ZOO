<?php


class CountryCityCountryLanguage {
    private $country, $city, $countryLanguage;
    
    function __construct(Cuidador $country,  Animal $city, CountryLanguage $countryLanguage) {
        $this->country = $country;
        $this->city = $city;
        $this->countryLanguage = $countryLanguage;
    }

    function getCountry() {
        return $this->country;
    }

    function getCity() {
        return $this->city;
    }

    function getCountryLanguage() {
        return $this->countryLanguage;
    }

    function setCountry(Cuidador $country) {
        $this->country = $country;
    }

    function setCity(Animal $city) {
        $this->city = $city;
    }

    function setCountryLanguage(CountryLanguage $countryLanguage) {
        $this->countryLanguage = $countryLanguage;
    }
    
    function getListCountryCityCountryLanguage($condicion = null, $parametros = array()){
        if($condicion === null){
            $condicion = "";
        }else{
            $condicion = "where $condicion";
        }
        $sql = " select co.*, ci.*, cl.*
                    from country co
                    left join city ci
                    on co.Code = ci.CountryCode
                    left join countrylanguage cl 
                    on co.Code =  cl.CountryCode $condicion";
         $this->bd->send($sql, $parametros);
         $r=array();
         while($fila =$this->bd->getRow()){
             $country = new Cuidador();
             $country->set($fila);
             $city = new Animal();
             $city->set($fila,15); 
             $countrylanguage = new CountryLanguage();
             $countrylanguage->set($fila, 20);
             $r[] = new CountryCityCountryLanguage($country, $city, $countrylanguage);
         }
         return $r;
    }
    
}
