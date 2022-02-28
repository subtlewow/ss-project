import { get, join, flatten, values, isObject, isString } from 'lodash-es';

/**
 * A generic handler for all xhr error responses from laravel.
 * Some responses are only available running laravel in debug mode.
 */
export default function onAjaxError(httpStatus, responseData) {
    let showError = (heading, error) => {
        swal({title: heading, html: error, type: 'error'}).finally(() => {
            let redirect = get(responseData, 'redirect') || get(responseData, 'message.redirect');
            if (redirect) {
                location.href = redirect;
            }
        });
    };

    // Was it an XHR abort? Dont need to handle these.
    if (httpStatus === 0) return;
    
    if (httpStatus === 403) {
        return showError('Permission Denied', 'You are not allowed to perform that action.');
    }

    if (httpStatus === 404) {
        return showError('Oops!', 'A page or resource you requested could not be found. Refresh the page and try again.');
    }

    // No specific response returned / internal server error. Just show general error message.
    if (httpStatus === 500) {
        return showError('Oops!', 'Something went wrong, please try again later');
    }

    // Laravel validation error messages
    if (isObject(responseData.errors)) {
        var validation = join(flatten(values(responseData.errors)), '<br>');
        return showError('Oops!', validation);
    }
    
    // Custom server error messages - These are simply stored in a object with a message key.
    if (responseData.message) {
        var message = responseData.message;
        if (isObject(message)) {
            return showError(message.heading, message.error);
        } else {
            return showError('Oops!', message);
        }
    }

    if (isString(responseData)) {
        // Plain string validation message
        return showError('Oops!', responseData);
    } else if (responseData.exception) {
        // Laravel internal error with no specific message, just echo the exception string.
        return showError('Oops!', responseData.exception);
    }

    return showError('Oops!', 'Something went wrong, please try again later');
}