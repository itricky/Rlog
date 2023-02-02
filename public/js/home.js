function subAlert() {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '請稍候.....',
        showConfirmButton: false,
        timer: 1500
    })

    // console.log('s');

    setTimeout(function () {
        console.log("Do this instead");
        $("form").first().submit();
    }, 1600);
}

