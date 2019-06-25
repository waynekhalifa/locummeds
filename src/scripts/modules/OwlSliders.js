import $ from 'jquery';

class OwlSliders{
    constructor() {
        this.events();
    }
    events() {
        $('.owl-carousel').owlCarousel();
    }
}

export default OwlSliders;