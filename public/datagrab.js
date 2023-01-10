"use strict";

fetch("./userdata/rfinlayson.json")
    .then(function(resp) {
        return resp.json();
    })
    .then(function(data){
        console.log(data);
        const iterator = data.values();
        for (const value of iterator) {
            console.log(value);
            document.getElementById('name').innerHTML = value.Name;
            document.getElementById('location').innerHTML = value.Location;
            document.getElementById('gender').innerHTML = value.Gender;
            document.getElementById('intrestone').innerHTML = value.IntrestOne;
            document.getElementById('intresttwo').innerHTML = value.IntrestTwo;
            document.getElementById('intrestthree').innerHTML = value.IntrestThree;
            document.getElementById('intrestfour').innerHTML = value.IntrestFour;
            document.getElementById('fpone').innerHTML = value.FPOne;
            document.getElementById('fptwo').innerHTML = value.FPTwo;
            document.getElementById('fpthree').innerHTML = value.FPThree;
            document.getElementById('fpfour').innerHTML = value.FPFour;
            document.getElementById('ffone').innerHTML = value.FFOne;
            document.getElementById('fftwo').innerHTML = value.FFTwo;
            document.getElementById('ffthree').innerHTML = value.FFThree;
            document.getElementById('fffour').innerHTML = value.FFFour;
          }
        
    });
