fetch('')
.then(response => response.json())
.then(data => {
   console.log(data);
   console.log("java anda bien");

})
.catch.error(error => {
    console.error(error);
});