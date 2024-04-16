document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('filter-btn').addEventListener('click', function() {
      var checkboxes = document.querySelectorAll('.filter-checkbox:checked');
      var filters = {};
  
      checkboxes.forEach(function(checkbox) {
        var key = checkbox.value;
        filters[key] = true;
      });
  
      var packages = document.querySelectorAll('.tour');
  
      packages.forEach(function(package) {
        var showPackage = true;
        var price = parseInt(package.getAttribute('data-price'));
        var days = parseInt(package.getAttribute('data-days'));
        var country = package.getAttribute('data-country');
  
        // Check if the package matches all selected criteria
        Object.keys(filters).forEach(function(key) {
          switch(key) {
            case '600':
              if (price >= 600) showPackage = false;
              break;
            case '600-900':
              if (price < 600 || price > 900) showPackage = false;
              break;
            case '900-1200':
              if (price < 900 || price > 1200) showPackage = false;
              break;
            case '1200-1800':
              if (price < 1200 || price > 1800) showPackage = false;
              break;
            case '1800-2400':
              if (price < 1800 || price > 2400) showPackage = false;
              break;
            case '2400':
              if (price <= 2400) showPackage = false;
              break;
            case '3-5':
              if (days < 3 || days > 5) showPackage = false;
              break;
            case '6-8':
              if (days < 6 || days > 8) showPackage = false;
              break;
            case '9-12':
              if (days < 9 || days > 12) showPackage = false;
              break;
            case '13-16':
              if (days < 13 || days > 16) showPackage = false;
              break;
            default:
              if (key !== 'Country' && country !== key) showPackage = false;
          }
        });
  
        if (showPackage) {
          package.style.display = 'flex';
        } else {
          package.style.display = 'none';
        }
      });
    });

    document.getElementById('reset-btn').addEventListener('click', function() {

        var checkboxes = document.querySelectorAll('.filter-checkbox:checked');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
    
        var packages = document.querySelectorAll('.tour');
        packages.forEach(function(package) {
          package.style.display = 'flex';
        });
      });
  });
  

  
  document.addEventListener("DOMContentLoaded", function () {
    var buttons = document.querySelectorAll(".show-more");

    buttons.forEach(function (button) {
        button.addEventListener("click", function () {
            var moreInfo = this.previousElementSibling;
            if (moreInfo.style.display === "none" || moreInfo.style.display === "") {
                moreInfo.style.display = "block";
                this.textContent = "Show Less";
            } else {
                moreInfo.style.display = "none";
                this.textContent = "Show More";
            }
        });
    });
});
