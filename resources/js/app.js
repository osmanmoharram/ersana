require('./bootstrap');

import Alpine from 'alpinejs';
import jQuery from 'jquery-slim';
import flatpickr from "flatpickr";
import axios from 'axios';

window.Alpine = Alpine;
window.$ = window.jQuery = jQuery;

Alpine.start();

const datePickers = document.querySelectorAll('.date-picker');

datePickers.forEach(item => {
    flatpickr(item, {
        altInput: true,
        altFormat: 'M j, Y',
        enableTime: false,
        onChange: function(selectedDate, config, instance) {
            // Close picker on date select
            instance.close();

            Alpine.store('bookingTimes').setDate(selectedDate);
        }
    });
});

const timePickers = document.querySelectorAll('.time-pickers');

timePickers.forEach(item => {
    flatpickr(item, {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
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

    fetch(hall) {
        axios.get(`/halls/${hall}/available-booking-times`, {
            params: {
                date: this.date,
                period: this.period
            }
        })
        .then(response => {
            $('#availableBookingTimes').removeClass('hidden');

            const bookingTimes = $('#availableBookingTimes tbody');

            response.data.times.forEach(time => {
                let row = `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-500">
                                <input
                                    name="bookingTime_id"
                                    value="${time.id}"
                                    type="radio"
                                    @click="$store.payment.total($el, 'bookingTime')"
                                    class="focus:ring-slate-600 h-4 w-4 text-slate-800 border-gray-300 cursor-pointer"
                                >
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-500">
                                ${time.from}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-500">
                                ${time.to}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="booking-time-price text-sm text-slate-500">
                                ${time.price}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-500"></div>
                        </td>
                    </tr>
                `;

                bookingTimes.append(row);
            });
        })
        .catch(errors => {
            console.log(errors);
        })
    },
});

Alpine.store('halls', {
    add() {
        // area where halls will be inserted
        const halls = $('#halls tbody');

        // number of inserted halls
        let counter = halls.children().length;

        // new hall values
        const name = $('#hallName').val();
        const cityDisplayValue = $('#hallCity input')[0].value;
        const citySendValue = $('#hallCity input')[1].value;
        const address = $('#address').val();
        const capacity = $('#capacity').val();

        let hall = `
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-slate-500">
                        ${name}
                        <input type="hidden" name="halls[${counter}][name]" value="${name}">
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-slate-500">
                        ${cityDisplayValue}
                        <input type="hidden" name="halls[${counter}][city]" value="${citySendValue}">
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-slate-500">
                        ${address}
                        <input type="hidden" name="halls[${counter}][address]" value="${address}">
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-slate-500">
                        ${capacity}
                        <input type="hidden" name="halls[${counter}][capacity]" value="${capacity}">
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

        halls.append(hall);
    }
})

Alpine.store('payment', {
    bookingTimePrice: 0,
    offerPrice: 0,
    totalPrice: 0,

    remainingAmount(element) {
        remainingAmount.value = element.value - this.totalPrice;
    },

    total(element, type) {
        if (type === 'bookingTime') {
            this.bookingTimePrice = parseFloat($(element).parents('tr').find('.booking-time-price').text().trim());
        }

        if (type === 'offer') {
            this.offerPrice = parseFloat($(element).parents('tr').find('.offer-price').text().trim());
        }

        total.value = this.totalPrice = this.bookingTimePrice + this.offerPrice;
    },
});
