<?php
/**
 * Physical address.
 */
class Address
{
  // Street address.
  public $streetAddress_1;
  public $streetAddress_2;
  // Name of the City.
  public $cityName;
  // name of the subdivision.
  public $subdivisionName;
  // Postal code.
  public $postalCode;
  // Name of the Country.
  public $countryName;

  /**
   * Display an address in HTML.
   * @return string
   */
  function display()
  {
    $output = '';
    
    // Streer address
    $output .= $this->streetAddress_1;
    if ($this->streetAddress_2)
    {
      $output .= '<br/>' . $this->streetAddress_2;
    }
    // City, Subdivisiom Postal.
    $output .= '<br/>';
    $output .= $this->cityName . ', ' . $this->subdivisionName;
    $output .= ' ' . $this->postalCode;

    // Country.
    $output .= '<br/>';
    $output .= $this->countryName;

    return $output;
  }
}


