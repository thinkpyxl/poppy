import createPeek from './peek.js';
import createActions from './actions.js';

const noop = () => {};

const createControls = ({
  peek_message = '',
  actions = [],
  open = noop,
}) => {
  const Controls = document.createElement('div');
  const Peek = createPeek(peek_message, open);
  const Actions = createActions(actions);
  const classes = `poppy__controls`;

  Controls.classList = classes;
  Controls.appendChild(Peek);
  Controls.appendChild(Actions);

  return Controls;
}

export default createControls;