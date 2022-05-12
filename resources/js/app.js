require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Alpine.store('selection', {
    select(target, value) {
        let inputs = target.parentElement.parentElement.querySelectorAll('input')

        inputs[0].value = target.textContent.trim();

        inputs[1].value = value;
    },
    features($el) {
        const features = document.querySelectorAll('.feature');

        if ($el.checked === true) {
            features.forEach(item => {
                item.checked = true;
            })
        } else {
            features.forEach(item => {
                item.checked = false;
            })
        }
    },
    priceType(type) {
        if (type === 'fixed') {
            fixedPrice.disabled = false;
            fixedPrice.classList.replace('bg-slate-200/40', 'bg-white');
            fixedPrice.classList.remove('cursor-not-allowed', 'text-slate-500');

            [individualPrice, numberOfGuests].forEach(field => {
                field.disabled = true;
                field.classList.replace('bg-white', 'bg-slate-200/40');
                field.classList.add('cursor-not-allowed', 'text-slate-500');
            });
        } else {
            fixedPrice.disabled = true;
            fixedPrice.classList.replace('bg-white', 'bg-slate-200/40');
            fixedPrice.classList.add('cursor-not-allowed', 'text-slate-500');

            [individualPrice, numberOfGuests].forEach(field => {
                field.disabled = false;
                field.classList.replace('bg-slate-200/40', 'bg-white');
                field.classList.remove('cursor-not-allowed', 'text-slate-500');
            });
        }
    }
});

Alpine.store('computeTotal', {
    nf: Intl.NumberFormat(),
    computed: 0,
    vat: 0,

    compute(type = null) {
        let result;

        console.log(fixedPrice.value);
        if (type === 'fixed' && fixedPrice.value && !isNaN(fixedPrice.value) && fixedPrice.value >= 0) {
            this.computed = fixedPrice.value;
        }

        if (type === 'individual' && individualPrice.value && !isNaN(individualPrice.value && individualPrice.value >= 0)) {
            this.type = 'individual';

            if (numberOfGuests.value && !isNaN(numberOfGuests.value)  && numberOfGuests.value >= 0) {
                this.computed = individualPrice.value * numberOfGuests.value;
            } else {
                this.computed = individualPrice.value;
            }
        }

        result = (discount.value && !isNaN(discount.value) && discount.value >=0)
            ? this.computed - discount.value
            : this.computed;

        result = (this.vat)
            ? result + (result * this.vat)
            : result;

        total.value = result;

        total.nextElementSibling.value = this.nf.format(result);
    },

    applyVat(value) {
        this.vat = value;
    }
});
