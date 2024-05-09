function formatDateAndTime(dateTime) {
    const formattedDate = dateTime.toLocaleDateString("sv-SE", {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
    });

    const formattedTime = dateTime.toLocaleTimeString("sv-SE", {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });

    return `${formattedDate} ${formattedTime}`;
}

const idrFormatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
});