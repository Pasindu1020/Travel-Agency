
function filterProducts() {
  const selectedCountries = getSelectedValues('.country-checkbox');
  const selectedDates = getSelectedValues('.date-checkbox');
  const selectedPrices = getSelectedValues('.price-checkbox');

  const products = document.querySelectorAll('.product');

  products.forEach((product) => {
    const productCountries = product.getAttribute('data-country').split(' ');
    const productDays = parseInt(product.getAttribute('data-days'), 10);
    const productPrice = parseInt(product.getAttribute('data-price'), 10);


    const countryMatch = selectedCountries.length === 0 || selectedCountries.some(country => productCountries.includes(country));
    const dateMatch = selectedDates.length === 0 || selectedDates.includes(getDateRange(productDays));
    const priceMatch = selectedPrices.length === 0 || selectedPrices.includes(getPriceRange(productPrice));

    if (countryMatch && dateMatch && priceMatch) {
      product.style.display = 'flex';
    } else {
      product.style.display = 'none';
    }
  });
}


function getSelectedValues(className) {
  const checkboxes = document.querySelectorAll(className + ':checked');
  return Array.from(checkboxes).map(checkbox => checkbox.value);
}


function getDateRange(days) {
  if (days >= 3 && days <= 5) {
    return '3-5';
  } else if (days >= 6 && days <= 8) {
    return '6-8';
  } else if (days >= 9 && days <= 12) {
    return '9-12';
  } else {
    return 'Unknown';
  }
}


function getPriceRange(price) {
  if (price < 600) {
    return '600';
  } else if (price >= 600 && price < 900) {
    return '600-900';
  } else if (price >= 900 && price < 1200) {
    return '900-1200';
  } else if (price >= 1200 && price < 1800) {
    return '1200-1800';
  } else if (price >= 1800 && price < 2400) {
    return '1800-2400';
  } else {
    return '2400';
  }
}


function resetFilters() {

  const checkboxes = document.querySelectorAll('.filter-checkbox:checked');
  checkboxes.forEach((checkbox) => {
    checkbox.checked = false;
  });
  const products = document.querySelectorAll('.product');
  products.forEach((product) => {
    product.style.display = 'flex';
  });
}


// script for show items in payment


function selectProduct(productName,  productDescription, productPrice) {
    localStorage.setItem('selectedProduct', JSON.stringify({ name: productName, description: productDescription, price: productPrice }));
    window.location.href = 'Payment.html';
}


