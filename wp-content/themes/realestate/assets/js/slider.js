$("#next").on("click", function() {
    let currentSlide = $(".isActive");

    currentSlide.removeClass("isActive")

    let nextSlide = currentSlide.next();

    if(nextSlide.length != 0){
        nextSlide.addClass("isActive");
    }else {
        let nextSlide = $("#image-gallery li").first()
        nextSlide.addClass("isActive");
    }

    $(".image-slider").attr('srcset', '')
    $(".image-slider").attr('src', $(".isActive img").attr("src"))
})

$("#prev").on("click", function() {
    let currentSlide = $(".isActive");

    currentSlide.removeClass("isActive")

    let prevSlide = currentSlide.prev();

    if(prevSlide.length != 0){
        prevSlide.addClass("isActive");
    }else {
        let prevSlide = $("#image-gallery li").last()
        prevSlide.addClass("isActive");
    }

    $(".image-slider").attr('srcset', '')
    $(".image-slider").attr('src', $(".isActive img").attr("src"))
})