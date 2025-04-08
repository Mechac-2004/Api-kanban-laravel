import { describe, it, expect, vi } from 'vitest';
import '@testing-library/jest-dom';
import { render, screen, fireEvent } from '@testing-library/react';
import Tache from '../components/Tache';

describe('Tache', () => {
  const task = { id: 1, title: 'Tâche 1', description: 'Description' };

  test('renders task title and edit/delete buttons', () => {
    render(<Tache task={task} />);
    expect(screen.getByText('Tâche 1')).toBeInTheDocument();
    expect(screen.getByRole('button', { name: /modifier/i })).toBeInTheDocument();
    expect(screen.getByRole('button', { name: /supprimer/i })).toBeInTheDocument();
  });

  test('calls onEdit when edit button is clicked', () => {
    const onEdit = jest.fn();
    render(<Tache task={task} onEdit={onEdit} />);
    fireEvent.click(screen.getByRole('button', { name: /modifier/i }));
    expect(onEdit).toHaveBeenCalledWith(task);
  });
});
