const noop = () => {};
const createAction = ({
  label = '',
  action = '',
  url = '',
  target = '',
  handler = webkitConvertPointFromNodeToPage,
}) => {
  const Action = document.createElement('button');
  const classes = `poppy__action poppy__action--${action}`;

  Action.classList = classes;
  Action.innerText = label;

  if (url && action === 'more') {
    Action.dataset['url'] = url;
  }

  if (target && action === 'more') {
    Action.dataset['target'] = target;
  }
  
  if (handler) {
    Action.addEventListener(
      'click',
      handler
    )
  }

  return Action;
}

export default createAction;