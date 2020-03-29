import { extend, localize } from 'vee-validate'
import nl from 'vee-validate/dist/locale/nl.json';
import en from 'vee-validate/dist/locale/en.json';
import { required, email } from 'vee-validate/dist/rules'

localize({
  nl,
  en,
});

extend('required', required)
extend('email', email)
