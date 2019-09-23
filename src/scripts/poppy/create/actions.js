import createAction from './action.js';

const createActions = actions => {
  const Actions = document.createElement('div');
  const classes = `poppy__actions`;

  actions.forEach(
    action => {
      const Action = createAction(action);

      Actions.appendChild(Action);
    }
  );

  Actions.classList = classes;

  return Actions;
}

export default createActions;