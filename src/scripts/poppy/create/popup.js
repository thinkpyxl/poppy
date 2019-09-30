import createContent from './content.js';
import createControls from './controls.js';
import Actions from '../actions/';
import Triggers from '../triggers';

const createPopup = ({
  title = '',
  slug = '',
  alignment = 'center',
  position = 'bottom',
  size = 'narrow',
  peek = true,
  docked = false,
  peek_message = '',
  content = '',
  actions = [],
  trigger = {},
  cookie = '',
}) => {
  const Popup = document.createElement('div');
  const activeActions = actions.map(
    action => ({
      ...action,
      handler: Actions[action.action](Popup, cookie),
    })
  );
  const Content = createContent({
    content,
    close: Actions.close(Popup)
  });
  const Controls = createControls({
    peek_message,
    actions: activeActions,
    open: Actions.open(Popup),
  });
  const classes = `poppy alignment--${alignment} position--${position} size--${size} ${peek ? 'peek' : 'peek--false' } ${docked ? 'docked' : '' } inactive`;

  Popup.classList = classes;
  Popup.appendChild(Content);
  Popup.appendChild(Controls);

  if (trigger) {
    Triggers[trigger.type](trigger, Popup);
  }

  return Popup;
}

export default createPopup;