import { render, screen, fireEvent } from '@testing-library/react';
import ColumnContainer from '../components/ColumnContainer';
import { describe, it, expect, vi } from 'vitest';
import '@testing-library/jest-dom';

describe('ColumnContainer', () => {
  const column = { id: 1, title: 'À faire', tasks: [{ id: 1, title: 'Tâche 1' }] };

  test('renders column title and tasks', () => {
    render(<ColumnContainer column={column} />);
    expect(screen.getByText('À faire')).toBeInTheDocument();
    expect(screen.getByText('Tâche 1')).toBeInTheDocument();
  });

  test('calls onAddTask when add task button is clicked', () => {
    const onAddTask = jest.fn();
    render(<ColumnContainer column={column} onAddTask={onAddTask} />);
    fireEvent.click(screen.getByRole('button', { name: /ajouter une tâche/i }));
    expect(onAddTask).toHaveBeenCalled();
  });
});
