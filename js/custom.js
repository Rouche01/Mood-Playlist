// window.addEventListener("load", () => {
//     console.log(document.querySelector("#subscriber-email"));
//     document.querySelector("#subscribe-submit").addEventListener("click", (e) => {
//         e.preventDefault();
//         console.log(e.target);
//     })
// })
$(document).ready(() => {
    // $("#subscriber-email").on( "keypress", function() {
    //     if($("#subscriber-email").val !== ""){
    //         $("#empty-error").fadeOut();
    //     }
    // })
    $("#subscribeForm").on('submit', (e) => {
        e.preventDefault();
        console.log("Hello");
        if($("#subscriber-email").val() === ''){
            $("#subscriber-email").css("border", "1px solid red");
            $("#empty-error").fadeIn();
        } else {
            $("#loading").css("display", "flex");
            const formData = $("#subscribeForm").serialize();
            $.ajax({
                type: "POST",
                url: "../storeEmail.php",
                data: formData,
                success: (response) => {
                    $("#loading").css("display", "none");
                    $("#subscribeForm").html(response);
                }
            })
        }
    })
})