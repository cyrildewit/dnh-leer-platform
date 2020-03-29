import Vue from 'vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import {
  faSearch as faSearchSolid,
  faTrash as faTrashSolid,
  faQuestionCircle as faQuestionCircleSolid
} from '@fortawesome/free-solid-svg-icons';

import {
  faEnvelope as faEnvelopeRegular,
  faEye as faEyeRegular
} from '@fortawesome/free-regular-svg-icons';

library.add(faSearchSolid);
library.add(faTrashSolid);
library.add(faQuestionCircleSolid);
library.add(faEnvelopeRegular);
library.add(faEyeRegular);

Vue.component('font-awesome-icon', FontAwesomeIcon)
