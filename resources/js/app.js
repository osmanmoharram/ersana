require('./bootstrap');

import Alpine from 'alpinejs';
import flatpickr from "flatpickr";

window.Alpine = Alpine;

Alpine.start();

flatpickr('#from', {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "08:00"
});
flatpickr('#to', {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "00:00"
});


Alpine.store('selection', {
    select(target, value) {
        let inputs = target.parentElement.parentElement.querySelectorAll('input')

        inputs[0].value = target.textContent.trim();

        inputs[1].value = value;
    },
    check(el, resource) {
        const resources = document.querySelectorAll('.' + resource);

        if (el.checked === true) {
            resources.forEach(item => {
                item.checked = true;
            })
        } else {
            resources.forEach(item => {
                item.checked = false;
            })
        }
    },
    period() {
        const bookingTimes = document.getElementById('bookingTimes');
        let counter = bookingTimes.querySelector('tbody').childElementCount;

        const tr = document.createElement('tr');

        const period = document.getElementById('period').querySelectorAll('input');
        const periodDisplay = period[0].value;
        const periodInput = document.createElement('input');
              periodInput.type = 'hidden';
              periodInput.name = "bookingTimes[${counter}]['period']";
              periodInput.value = period[1].value;

        const from = document.getElementById('from').value;
        const fromInput = document.createElement('input');
              fromInput.type = 'hidden';
              fromInput.name = "bookingTimes[${counter}]['from']";
              fromInput.value = from.value;

        const to = document.getElementById('to').value;
        const toInput = document.createElement('input');
              toInput.type = 'hidden';
              toInput.name = "bookingTimes[${counter}]['to']";
              toInput.value = to.value;

        for (let i=0; i<3; i++) {
            const td_i = document.createElement('td');
                td_i.classList.add('px-6', 'py-4', 'whitespace-nowrap');
        }

        for (let i=0; i<3; i++) {
            const div_i = document.createElement('div');
                div_i.classList.add('text-sm', 'text-slate-500');
        }

        div_0.textContent = periodDisplay
        div_0.appendChild(periodInput);
        div_1.textContent = from.value
        div_1.appendChild(fromInput);
        div_2.textContent = to.value
        div_2.appendChild(toInput);

        for (let i=0; i<3; i++) {
            td_i.appendChild(div_i);
            tr.appendChild(td_i)
        }

        bookingTimes.appendChild(tr);
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
