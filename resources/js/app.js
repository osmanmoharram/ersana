require('./bootstrap');

import Alpine from 'alpinejs';
import jQuery from 'jquery-slim';
import flatpickr from "flatpickr";
import axios from 'axios';

window.Alpine = Alpine;
window.$ = window.jQuery = jQuery;

Alpine.start();

flatpickr('#date', {
    altInput: true,
    altFormat: 'M j, Y h:i K',
    enableTime: true,
    onChange: function(selectedDate, config, instance) {
        // Close picker on date select
        instance.close();

        Alpine.store('bookingTimes').setDate(selectedDate);
    }
});
flatpickr('#from', {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "08:00",
});
flatpickr('#to', {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "00:00",
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
        const price = $('#price').val();

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
                    <div class="text-sm text-slate-500">
                        ${price}
                        <input type="hidden" name="bookingTimes[${counter}][price]" value="${price}">
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
    },
});

Alpine.store('bookingTimes', {
    date: '',
    period: '',

    setDate(date) {
        this.date = date; 
    },
    
    setPeriod(period) {
        this.period = period;
    },

    get(hallId) {
        axios.get(`/halls/${hallId}/booking-times`, {
            date: this.date,
            period: this.period
        })
        .then(response => {
            console.log(response.data);
        })
        .catch(errors => {
            console.log(errors.data);
        })
    }
})

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
