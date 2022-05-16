require('./bootstrap');

import Alpine from 'alpinejs';
import jQuery from 'jquery-slim';
import flatpickr from "flatpickr";

window.Alpine = Alpine;
window.$ = window.jQuery = jQuery;

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
        // area where times will be inserted
        const bookingTimes = $('#bookingTimes tbody');

        // number of inserted times
        let counter = bookingTimes.children().length;

        console.log(counter);
        // new time values
        const periodDisplayValue = $('#period input')[0].value;
        const periodsendValue = $('#period input')[1].value;
        const from = $('#from').val();
        const to = $('#to').val();

        let time = `
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-slate-500">
                        ${periodDisplayValue}
                        <input type="hidden" name="bookingTimes[${counter}][period]" value="${periodsendValue}">
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-slate-500">
                        ${from}
                        <input type="hidden" name="bookingTimes[${counter}][from]" value="${from}">
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-slate-500">
                        ${to}
                        <input type="hidden" name="bookingTimes[${counter}][to]" value="${to}">
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <button @click.prevent="$el.parentElement.parentElement.remove()" class="text-red-400 hover:text-red-500 py-2 px-4 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                <td>
            </tr>
        `;

        bookingTimes.append(time);
        // const tr = document.createElement('tr');

        // const period = document.getElementById('period').querySelectorAll('input');
        // const periodDisplay = period[0].value;
        // const periodInput = document.createElement('input');
        //       periodInput.type = 'hidden';
        //       periodInput.name = "bookingTimes[${counter}]['period']";
        //       periodInput.value = period[1].value;

        // const from = document.getElementById('from').value;
        // const fromInput = document.createElement('input');
        //       fromInput.type = 'hidden';
        //       fromInput.name = "bookingTimes[${counter}]['from']";
        //       fromInput.value = from.value;

        // const to = document.getElementById('to').value;
        // const toInput = document.createElement('input');
        //       toInput.type = 'hidden';
        //       toInput.name = "bookingTimes[${counter}]['to']";
        //       toInput.value = to.value;

        // for (let i=0; i<3; i++) {
        //     const td_i = document.createElement('td');
        //         td_i.classList.add('px-6', 'py-4', 'whitespace-nowrap');
        // }

        // for (let i=0; i<3; i++) {
        //     const div_i = document.createElement('div');
        //         div_i.classList.add('text-sm', 'text-slate-500');
        // }

        // div_0.textContent = periodDisplay
        // div_0.appendChild(periodInput);
        // div_1.textContent = from.value
        // div_1.appendChild(fromInput);
        // div_2.textContent = to.value
        // div_2.appendChild(toInput);

        // for (let i=0; i<3; i++) {
        //     td_i.appendChild(div_i);
        //     tr.appendChild(td_i)
        // }

        // bookingTimes.appendChild(tr);
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
