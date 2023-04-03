$.ajax({
    url: "../login/signup.php",
    type: "POST",
    data: {

    },
    success: (res) => {
        console.table(res)
    },
});